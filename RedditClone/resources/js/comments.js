window.toggleReplyFormVisbility = function (e) {
    e.preventDefault();

    var temp = e.target.closest(".comment").querySelector(".replyform");
    console.log(temp);
    temp.classList.toggle("reply-form-visible");
    //e.target.closest(".comment").classList.toggle("reply-form-visible");
};

window.toggleEditFormVisbility = function (e) {
    e.preventDefault();

    var temp = e.target.closest(".comment").querySelector(".editform");

    temp.classList.toggle("edit-form-visible");
    //e.target.closest(".comment").classList.toggle("reply-form-visible");
};

