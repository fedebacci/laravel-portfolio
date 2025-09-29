<h1>
    Admin profile
</h1>
<ul>
    <li>
        Nome: {{ $user['name'] }}
    </li>
    <li>
        Email: {{ $user['email'] }}
    </li>
    <li>
        Creato: {{ $user['created_at'] }}
    </li>
    <li>
        Modificato: {{ $user['updated_at'] }}
    </li>
</ul>