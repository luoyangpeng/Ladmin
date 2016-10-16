<?php

namespace App\Http\Middleware;

use App\Repositories\WechatUserRepository;
use Closure;
use Event;
use Overtrue\LaravelWechat\Events\WeChatUserAuthorized;

/**
 * Class OAuthAuthenticate.
 */
class OAuthAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $wechat = app('EasyWeChat\\Foundation\\Application', [config('wechat')]);

        $isNewSession = false;

        if (!session('wechat.oauth_user')) {
            if ($request->has('state') && $request->has('code')) {
                session(['wechat.oauth_user' => $wechat->oauth->user()]);
                $isNewSession = true;

                return redirect()->to($this->getTargetUrl($request));
            }

            $scopes = ['snsapi_userinfo'];

            if (is_string($scopes)) {
                $scopes = array_map('trim', explode(',', $scopes));
            }

            return $wechat->oauth->scopes($scopes)->redirect($request->fullUrl());
        }

        Event::fire(new WeChatUserAuthorized(session('wechat.oauth_user'), $isNewSession));

        //保存微信用户信息
        $user = session("wechat.oauth_user");
        $wechatRepository = new WechatUserRepository();
        $data = [
            'openid'   => $user->original['openid'],
            'nickname' => $user->original['nickname'],
            'sex'      => $user->original['sex'],
            'province' => $user->original['province'],
            'city'     => $user->original['city'],
            'country'  => $user->original['country'],
            'headimgurl' => $user->original['headimgurl'],
        ];
        $wechatRepository->store($data);

        return $next($request);
    }

    /**
     * Build the target business url.
     *
     * @param Request $request
     *
     * @return string
     */
    public function getTargetUrl($request)
    {
        $queries = array_except($request->query(), ['code', 'state']);

        return $request->url().(empty($queries) ? '' : '?'.http_build_query($queries));
    }
}
