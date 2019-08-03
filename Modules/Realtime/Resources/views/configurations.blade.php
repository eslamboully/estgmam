  @if(auth('web')->check())

    <script src="{{ url('/assets2/js/socket.io-client/socket.io.js')}}"></script>
	  <script src="{{ url('/assets2/js/socket.io.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets2/css/chat.css') }}">

  <script type="text/javascript">

    var user_id = '{{ user()->id }}';
    var name = '{{  user()->full_name }}';
    var user_image="{{ user()->image }}";
    var typingurl= '{{ url('assets2/img/typing.gif') }}';
    var message = '{{ url('/chat/message') }}';
    var token = '{{ csrf_token() }}';
    var base_image = "{{ asset(user()->image) }}";
    var my_friends = [];

   $('.messageCommon').each(function(index, el) {
    var user_id = $(this).attr('user_id');
    my_friends.push(user_id);
   });

   var active_suppliers = [];
   var active_contractors = [];

   var socket = io.connect('http://localhost:3000' , {

    query: 'user_id=' + user_id + '&name=' + name + '&user_image=' + user_image +'&my_friends=' + my_friends+'&role='+'user'

   });
</script>
@endif