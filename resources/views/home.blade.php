<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    @auth
        <p>Congratulations You are logged In</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div style="border: 5px solid black;">
            <h2>Create A Post</h2>
            <form action="/create" method="POST">
                @csrf
                <input name="title" placeholder="title" type="text">
                <textarea name="body" placeholder="body..." cols="30" rows="10"></textarea>
                <button>Post</button>
            </form>
        </div>

        <div style="border: 5px solid black;">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
            <div style= "background-color: gray; padding:10px; margin:10px;">
                <h3> {{$post['title']}} </h3>
                {{$post['body']}}
                <p><a href="/edit/{{$post->id}}">Edit</a></p>
                <form action="/delete/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach

        </div>
    @else
    <div style="border: 5px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 5px solid black;">
        <h2>Log In</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="logname" type="text" placeholder="name">
            <input name="logpassword" type="password" placeholder="password">
            <button>Log In</button>
        </form>
    </div>

    @endauth

</body>
</html>
