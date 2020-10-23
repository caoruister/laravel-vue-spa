@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">

  <meta name="keywords" content="反羊毛,反欺诈,风险识别,羊毛,羊毛党,薅羊毛,撸羊毛,反刷单,风控,接码,打码,代理,拨号VPS,">
  <title>{{ config('app.name') }}</title>
  <meta name="description" content="太乙风控，是一个专注于互联网营销反作弊和用户行为溯源的平台。我们的核心理念是：把握互联网用户的行为路径并抽取关键特征，不同于常见风控平台模棱两可的打分，太乙风控更倾向于对作弊行为的精确狙击。对羊毛党惯用的手段如：机房服务器模拟，代理服务器刷量，黑客肉鸡刷量，接码手机模拟真实用户等，有精准的识别能力。同时，太乙风控的反羊毛专家团队，凭借与灰黑产业的多年经验，积累了涵盖从手机号，到伪造的身份证号，以及虚拟银行卡等作弊工具的庞大黑产数据库。">

  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
  <script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1279373205&web_id=1279373205" style="display: none"></script>
</body>
</html>
