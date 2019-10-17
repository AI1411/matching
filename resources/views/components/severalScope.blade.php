<p class="text-center mt-3 mr-2 hidden-sm">
    <a href="{{ route('users.index') }}">条件をリセットする</a>
</p>
<form action="" onchange="this.form.submit()" method="get">
    <p class="text-center mt-3 mr-2 hidden-sm">
        <select name="searchRegion" id="" onchange="this.form.submit()">
            @foreach(config('const.region') as $key => $region)
                <option value="{{ $key }}">{{ $region }}</option>
            @endforeach
        </select>
    </p>
</form>
<form action="" method="get">
    <p class="text-center mt-3 mr-2">
        <select name="searchPref" id="" onchange="this.form.submit()">
            @foreach(config('const.pref') as $key => $pref)
                <option value="{{ $key }}">{{ $pref }}</option>
            @endforeach
        </select>
    </p>
</form>
<form action="">
    <p class="text-center mt-3">
        <select name="searchAge" id="" onchange="this.form.submit()">
            @foreach(config('const.ages') as $key => $age)
                <option value="{{ $key }}">{{ $age }}</option>
            @endforeach
        </select>
    </p>
</form>
<form action="" method="get">
    <p class="text-center mt-3 mr-2">
        <select name="sortByLoginAtOrLatest" id="" onchange="this.form.submit()">
            <option value="0">お選びください</option>
            <option value="1">ログイン時間順</option>
            <option value="2">アカウント作成順</option>
        </select>
    </p>
</form>
<form action="" method="get">
    <p class="text-center mt-3 mr-2">
        <select name="sortByLikesOrFavorite" id="" onchange="this.form.submit()">
            <option value="0">お選びください</option>
            <option value="sortByLikes">いいねの多い順</option>
            <option value="sortByFavorites">お気に入りの多い順</option>
        </select>
    </p>
</form>
