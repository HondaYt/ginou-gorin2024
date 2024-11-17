<div>
    @error('auth')
    <p>{{$message}}</p>
    @enderror
    <form method="POST">
        @csrf
        <label for="email">メールアドレス:</label>
        <input type="email" name="email" id="email">
        
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password">
        <button type="submit">ログイン</button>
    </form>
</div>