# **_oautwitube_**
[![Latest Stable Version](https://poser.pugx.org/densul/oautwitube/version)](https://packagist.org/packages/densul/oautwitube)
[![Total Downloads](https://poser.pugx.org/densul/oautwitube/downloads)](https://packagist.org/packages/densul/oautwitube)[![Latest Unstable Version](https://poser.pugx.org/densul/oautwitube/v/unstable)](//packagist.org/packages/densul/oautwitube)
[![License](https://poser.pugx.org/densul/oautwitube/license)](https://packagist.org/packages/densul/oautwitube)
[![composer.lock available](https://poser.pugx.org/densul/oautwitube/composerlock)](https://packagist.org/packages/densul/oautwitube)

Данный пакет предназначен для laravel 5.6+, для работы с API youtube.com и twitch.tv.
В данное время доступна только oAuth авторизация и получение информации о текущем пользователе с этих ресурсов. 



##**_Установка_**

```
composer require densul/oautwitube
```

Затем добавить в файле `config/app.php`, добавить нужный Вам сервис-провайдер в providers.
Можно сразу оба:

```PHP
densul\oautwitube\Providers\TwitchServiceProvider::class,
densul\oautwitube\Providers\YoutubeServiceProvider::class
```

Там же задать алиасы:

```PHP
'TwitchApi' => densul\oautwitube\Facades\TwitchServiceFacade::class,
'YoutubeApi' => densul\oautwitube\Facades\YoutubeServiceFacade::class
```

Далее создаем конфиг:
```
php artisan vendor:publish
```
Выбираем любой сервис-провайдер, если Вы добавили несколько.
После этого появится конфиг в `/config/oautwitube-api.php`

Для площадки youtube подтребуется включить API 3, [Здесь](https://console.developers.google.com/apis/api/youtube.googleapis.com/).

##**_Использование_**

В шаблонизаторе:
```HTML
<div class="links">
    <a href="{{ TwitchApi::AuthenticationURL() }}">Auth Twitch</a>
    <a href="{{ YoutubeApi::AuthenticationURL() }}">Auth YouTube</a>
</div>
```
Соответственно какой Вы задатите redirect_url в конфиге, создаем роуты:

```PHP
Route::get('/auth', ['as' => 'auth', 'uses' => 'Auth\LoginController@twitchLogin']);
Route::get('/auth_youtube', ['as' => 'auth', 'uses' => 'Auth\LoginController@youtubeLogin']);
```

В LoginController:
```PHP
public function twitchLogin(Request $request)
{

    $code  = $request->input('code');
    $token = \TwitchApi::RequestToken($code);
    $user  = \TwitchApi::AuthenticatedUser($token);

    dd($user);
}

public function youtubeLogin(Request $request)
{
    $code   = $request->input('code');
    $token  = \YoutubeApi::RequestToken($code);
    $user   = \YoutubeApi::AuthenticatedUser($token);
    dd($user);
}
```

Пока все, функционал буду дописывать по мере необходимости, следите за обновлениями. 