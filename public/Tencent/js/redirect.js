function removeXSS(s) {
	var pattern = new RegExp("[<>’”]")
	var rs = "";
	for (var i = 0; i < s.length; i++) {
		rs = rs+s.substr(i, 1).replace(pattern, '');
	}
	return rs;
}

if (location.protocol == 'http:'){
	//location.protocol = 'https:';
}

/*if (bowser.mobile) {
	var url = location.href.replace(/(zh-cn|zh-hk|en-us)/,'mobile/$1');
	url = removeXSS(url);
	url = url.replace(/(company|culture|system|investor)\.html/, function($1){
		var names = ['company.html', 'culture.html', 'system.html', 'investor.html'];
		var count = names.length;
		var hash = 0;
		for(var i = 0; i < count; i++){
			if(names[i] === $1){
				hash = i;
				break;
			}
		}
		hash++;
		return 'index.html#' + hash;
	});
	url = removeXSS(url);
	location.href = url;
}*/