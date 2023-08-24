<head>
  <base href="[[++site_url]]" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=5.0"
  />

  <title>[[*longtitle]]</title>
  <meta name="description" content="[[*description]]" />

  <!-- favicon -->
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="/assets/theme/build/img/favicon/apple-touch-icon.png"
  />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="/assets/theme/build/img/favicon/favicon-32x32.png"
  />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="/assets/theme/build/img/favicon/favicon-16x16.png"
  />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    rel="preload"
    as="style"
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,300;0,400;0,700;1,400&display=swap"
  />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    media="print"
    onload="this.media='all'"
  />
  <noscript>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    />
  </noscript>

  <!-- css -->
  <link
    rel="stylesheet"
    href="/assets/theme/build/css/[[+css:empty=`main`]].min.css?v=20230824"
  />

  [[+trustbox:is=`1`:then=`
  <!-- TrustBox script -->
  <script
    type="text/javascript"
    src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"
    async
  ></script>
  <!-- End TrustBox script -->
  `]]
</head>
