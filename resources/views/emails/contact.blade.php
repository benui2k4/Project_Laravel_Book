<x-mail::message>
    # Họ tên : {{$data['name']}}
    ## Email : {{$data['email']}}
    ## Phone : {{$data['phone']}}
    <p>
        {{$data['body']}}
    </p>

    <x-mail::button :url="''">
        Xác nhận Email
    </x-mail::button>

    Thanks,<br>
    Cảm ơn bạn đã check mail!
</x-mail::message>