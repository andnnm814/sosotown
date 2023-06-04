$(function() {
    var like = $('.fa-heart'); // fa-heartのついたiタグを取得し代入
    var likeProductId;

    // iタグがクリックされたら
    like.on('click', function() {
        var $this = $(this); // $(this)=イベントの発火した要素＝iタグ
        likeProductId = $this.data('product-id'); // iタグに仕込んだdata-product-idの値を取得
        // ajax処理開始
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike',
            type: 'POST',
            data: {
                'product_id': likeProductId // コントローラーに渡すパラメーター($requestに値が渡される)
            },
        })
        // ajaxリクエスト通信成功
        .done(function(){ // 引数にはコントローラーから返された値が入る
            $this.toggleClass('liked'); // likedクラスを追加
        })
        // ajaxリクエスト通信失敗
        .fail(function() {
            console.log('fail');
        });
        return false;
    });
});