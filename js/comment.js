const submit = document.querySelector('#submit');
submit.addEventListener('click', () => {
    const product_id = document.querySelector('#product_id');
    const comment_content = document.querySelector('#comment_content');
    const comment_rate = document.querySelector('#comment_rate');
    const name_comment = document.querySelector('#name_comment');
    

    if (comment_content.value != "" && comment_rate.value != "" && name_comment.value != "") {
        addComment(comment_content.value, comment_rate.value, product_id.value, name_comment.value);
    }
    else {
        const divResults = document.querySelector('#show-comment');
        divResults.innerHTML += `<p>Vui lòng nhập đầy đủ dữ liệu</p>`;
    }
});
// comment
async function addComment(comment_content, comment_rate, product_id, name_comment) {
    let today = new Date();
    let date = "";
    if (today.getMonth() < 10 && today.getDate() < 10) {
        date = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-0' + today.getDate();
    }
    else if (today.getDate() < 10) {
        date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-0' + today.getDate();
    }
    else if (today.getMonth() < 10) {
        date = today.getFullYear() + '-0' + (today.getMonth() + 1) + '-' + today.getDate();
    }
    else {
        date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    }

    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    const dateTime = date + ' ' + time;
    //Buoc 1:
    const url = './addComments.php';
    const data = { comment_content: comment_content, comment_rate: comment_rate, product_id: product_id, name_comment: name_comment };
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    });

    // Buoc 2:
    const result = await response.json();
    var star = "";
    for (var i = 1; i <= comment_rate; i++) {
        star += '<i class="fa fa-star" style="color:#FF9900"></i>';
        var sum = 0;
        var total_star = 0;
        result.forEach(function (element) {
            sum += element.comment_rate;
        });
        if (sum <= 0) {
            total_star = 0;
        }
        else {
            total_star = Math.round(sum / result.length);
        }
        let start_num = document.querySelector('#star_num');
        if(start_num == null){
            start_num = 0;
            start_num.innerHTML = total_star;
        }
    }
    // Hien thi giao dien
    const divResult = document.querySelector('#show-comment');
    divResult.innerHTML += `
        <div class='show'>
            <div class='show-name'>
                <p>By <b>${name_comment}</b> on <i>${dateTime}</i></p>
                ${star}
            </div>
            <div class='show-content'>
                <p>${comment_content}</p>
            </div>
        </div>
    `;
}
//search
const searchbox = document.querySelector('#search');
searchbox.addEventListener('keyup', function () {
    searchByKeyword(searchbox.value);
});

async function searchByKeyword(keyword) {
    const url = './getSearch.php';
    const data = {keyword: keyword};

    const response = await fetch(url, {
        method : "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=UTF-8'
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();

    const divResult = document.querySelector('#show-list');
    divResult.innerHTML = '';
    result.forEach(item => {
        let keyWordReg = new RegExp(keyword,"gi");
        let productName = item.product_name.replace(keyWordReg, `<b>${keyword}</b>`);
        divResult.innerHTML += `
        <div class=' list-group-item list-group-item-action border-1'>
            <div class="row">
                <div class="col-md-9">
                    <a href='product.php/-${item.id}'>${productName}</a>
                </div>
                <div class="col-md-3">
                    <img class='img-fluid' src='./img/${item.product_photo}'>
                </div>
            </div>
       </div>
        `;
    })
} 
