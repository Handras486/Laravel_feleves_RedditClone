window.toggleReplyFormVisbility = function (e) {
    e.preventDefault();

    var asd = e.target.closest(".comment").querySelector(".replyform");
    console.log(asd);
    asd.classList.toggle("reply-form-visible");
    //e.target.closest(".comment").classList.toggle("reply-form-visible");
};
