$(function () {
    // 「add」のボタンをクリックしたとき
    // console.log('test');
    $('.favorite-add-button').click(function (event) {
        // console.log(event);
        event.preventDefault();//submit処理を止める

        var param = $(this).parent('.like-form').serializeArray();
        //$(this)はデータ取得専用の変数
        //console.log(param);
        $.ajax({
            url: '/ThreadLikes/add', 
            async: false,// FavoritesControllerのaddアクションに送ります
            type: 'POST',
            dataType: 'json',
            data: param,
            timeout: 10000,
            
        }).done(function (result) { // 成功の場合
            // FavoriteControllerのaddアクションのreturnの結果がresultに入っています
            // divのclass属性のhideを逆にします
            //console.log(result);
            $('#addfavorite' + result[1][1]['thread_id']).addClass('hide');
            $('#deletefavorite' + result[1][1]['thread_id']).removeClass('hide');

            // いいね数を取得した数に書き換えます
            $('#favCount' + result[1][1]['thread_id']).text(result['0']);
            console.log(result['0']);
        }).fail(function (XMLHttpRequest, textStatus, errorThrown) { // 失敗の場合
            alert("失敗");
            
            
            // console.log(XMLHttpRequest);
            // console.log(errorThrown);

            // console.log(textStatus);
        });
    });

    // 「delete」のボタンをクリックしたとき
    $('.favorite-delete-button').click(function (event) {
        event.preventDefault();

        var param = $(this).parent('.like-form').serializeArray();
        console.log(param);
        $.ajax({
            url: '/ThreadLikes/delete',
            async: false,
            type: 'POST',
            dataType: 'json',
            data: param,
            timeout: 10000,
        }).done(function (result) {
            console.log(result);
            $('#addfavorite' + result[1][1]['thread_id']).removeClass('hide');
            $('#deletefavorite' + result[1][1]['thread_id']).addClass('hide');
            $('#favCount' + result[1][1]['thread_id']).text(result[0]);
            // console.log(result[0]);
        }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
            alert("失敗");

            console.log(XMLHttpRequest);
            console.log(errorThrown);

            console.log(textStatus);
        });
    });
});