var fy = new Vue({
  el: "#faruklikepul-like-unlike",
  data: {
    total: faruklikepul_get_like,
    liked: liked_cookie_set
  },
  methods: {
    like: function(like_id) {
      jQuery
        .post({
          url: admin_ajax_url,
          data: {
            action: "faruklikepul_like_button",
            liked_post_id: like_id
          }
        })
        .done(function(response) {
          var resdata = response;
          //console.log(resdata);
          fy.liked = false;
          fy.total = resdata.Like;
        });
    },
    unlike: function(like_id) {
      jQuery
        .post({
          type: "post",
          url: admin_ajax_url,
          data: {
            action: "faruklikepul_unlike_button",
            liked_post_id: like_id
          }
        })
        .done(function(response) {
          var resdata = response;
          //console.log(resdata);
          fy.liked = true;
          fy.total = resdata.Like;
        });
    }
  }
});
