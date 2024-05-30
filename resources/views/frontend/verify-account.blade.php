<h3>Hi: {{ $account->name }}</h3>

<p>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium itaque similique autem nulla doloribus ipsam quae incidunt repudiandae! Quibusdam a vitae pariatur tempore tenetur consequuntur assumenda facere veritatis debitis sed!
</p>

<p>
    <a href="{{route('user.verify', $account->email)}}">Click đây để xác minh Email </a>
</p>