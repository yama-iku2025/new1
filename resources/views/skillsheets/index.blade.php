{{-- resources/views/skillsheets/index.blade.php --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>スキルシート一覧</title>
</head>
<body>
    <h1>スキルシート一覧</h1>

    @foreach ($sheets as $sheet)
        <hr>
        <h2>{{ $sheet->name }}（{{ $sheet->experience_years }}年）</h2>
        <p><strong>年齢：</strong>{{$sheet->age}}</p>
        <p><strong>住所：</strong> {{ $sheet->address }}</p>
        <p><strong>メール：</strong> {{ $sheet->email }}</p>
        <p><strong>自己PR：</strong> {{ $sheet->self_pr }}</p>

        <h3>■ スキル</h3>
        <ul>
            @foreach ($sheet->skills as $skill)
                <li>
                    {{ $skill->category }}：{{ $skill->name }}（{{ $skill->years }}年・評価: {{ $skill->level }}/5）
                </li>
            @endforeach
        </ul>

        <h3>■ プロジェクト</h3>
        <ul>
            @foreach ($sheet->projects as $project)
                <li>
                    {{ $project->name }}（{{ $project->start_date }}〜{{ $project->end_date ?? '現在' }})<br>
                    <strong>担当:</strong> {{ $project->role }}<br>
                    <strong>技術:</strong> {{ $project->tech_stack }}
                </li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
