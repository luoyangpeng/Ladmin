<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">{{trans('labels.role.show')}}</h4>
        </div>
        <div class="modal-body">
          <div class="table-scrollable">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1 text-center">{{trans('labels.role.module')}}</th>
                        <th class="col-md-10 text-center">{{trans('labels.role.permission')}}</th>
                    </tr>
                </thead>
                <tbody>
                  @if($permissions)
                  @foreach($permissions as $permission)
                    @foreach($permission as $k => $v)
                      <tr>
                        <td class="text-center" style="vertical-align: middle;"> {{$k}} </td>
                        <td>
                          @if(isDoubleArray($v))
                          @foreach($v as $val)
                          <div class="col-md-4">
                            <label>{{$val['desc']}}</label>
                          </div>
                          @endforeach
                          @else
                          <div class="col-md-4">
                            <label>{{$v['desc']}}</label>
                          </div>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  @endforeach
                  @endif
                </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn green btn-outline" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>