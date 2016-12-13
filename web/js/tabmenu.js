jQuery(function($){
    $('#tabcontent > div').hide(); //初期では非表示

    $('#tabnavi a').click(function () {
	$('#tabcontent > div').hide().filter(this.hash).fadeIn(); //アンカー要素を表示

	$('#tabnavi a').removeClass('active');
	$(this).addClass('active');

	return false; //いれてないとアンカーリンクになる
	}).filter(':eq(0)').click(); //最初の要素をクリックした状態に
});
