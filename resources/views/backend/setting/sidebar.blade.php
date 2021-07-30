<div class="list-group ml-3">
    <a href="{{ route('admin.setting') }}" class="list-group-item list-group-item-action {{ Route::is('admin.setting') ? 'active' : ''  }}">
        General
    </a>
    <a href="{{ route('admin.appearance') }}" class="list-group-item list-group-item-action {{ Route::is('admin.appearance') ? 'active' : ''  }}">
        Appearance
    </a>
    <a href="{{ route('admin.mail') }}" class="list-group-item list-group-item-action {{ Route::is('admin.mail') ? 'active' : ''  }}">
        Mail
    </a>
    {{-- <a href="{{ route('app.settings.socialite.index') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.socialite.index') ? 'active' : ''  }}">
        Socialite
    </a>  --}}
</div>