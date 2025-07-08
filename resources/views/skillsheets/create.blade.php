<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>スキルシート作成</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        input, textarea {
            width: 90%;
        }
    </style>
</head>
<body>
    <h1>スキルシート作成</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skillsheets.store') }}" method="POST">
        @csrf

        <fieldset>
            <legend>基本情報</legend>
            <label>氏名：<input type="text" name="name" value="{{ old('name') }}"></label><br><br>
            <label>年齢：<input type="number" name="age" value="{{ old('age') }}"></label><br><br>
            <label>住所：<input type="text" name="address" value="{{ old('address') }}"></label><br><br>
            <label>メール：<input type="email" name="email" value="{{ old('email') }}"></label><br><br>
            <label>実務経験年数：<input type="number" name="experience_years" value="{{ old('experience_years') }}"></label><br><br>
            <label>自己PR：<br><textarea name="self_pr" rows="4">{{ old('self_pr') }}</textarea></label>
        </fieldset>

        <h2>スキル一覧</h2>

        <table>
            <thead>
                <tr>
                    <th>カテゴリ</th>
                    <th>スキル名</th>
                    <th>経験年数</th>
                    <th>レベル（1〜5）</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 5; $i++)
                    <tr>
                        <td><input type="text" name="skills[{{ $i }}][category]" value="{{ old("skills.$i.category") }}"></td>
                        <td><input type="text" name="skills[{{ $i }}][name]" value="{{ old("skills.$i.name") }}"></td>
                        <td><input type="number" name="skills[{{ $i }}][years]" value="{{ old("skills.$i.years") }}" min="0"></td>
                        <td><input type="number" name="skills[{{ $i }}][level]" value="{{ old("skills.$i.level") }}" min="1" max="5"></td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <br>
        <button type="submit">登録する</button>
    </form>

    <br>
    <a href="{{ route('skillsheets.index') }}">一覧に戻る</a>
</body>
</html>
