@component('mail::message')
# Welcome to Laravel CMS


Thankyou for register with <b>LARAVEL CMS</b><br />
here are our latest post<br />
which you might be interested in<br />

@foreach($posts as $post)

## <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>

@endforeach



@component('mail::button', ['url' => route('posts.index')])
Latest Posts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
