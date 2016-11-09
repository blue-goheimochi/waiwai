<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('pageDescription')">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle')</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body id="@yield('pageId')">
    @include('layouts.nav')
    @yield('container')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
    <script>
    <!--
    Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
    var example1 = new Vue({
      el: '#new-comments',
      data: {
        items: []
      }
    })
    var commentPost = new Vue({
      el: '#comment-post',
      methods: {
        submit: function(event) {
        console.log(example1)
          this.$http.post('/comment/new', this.params).then(function(response){
            $("#comment-input").val('');
            var data = {
              id: response.body.id,
              name: 'TEST',
              body: response.body.body,
              created_at: response.body.created_at
            }
            example1.items.push(data)
          }, function(response) {
            alert(response.data)
          });
        }
      }
    })
    -->
    </script>
  </body>
</html>
