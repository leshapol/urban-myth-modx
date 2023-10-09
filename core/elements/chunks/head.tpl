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
    href="/assets/theme/build/css/[[+css:empty=`main`]].min.css?v=20231010"
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

  <!-- Lucky Orange -->
  <script
    async
    defer
    src="https://tools.luckyorange.com/core/lo.js?site-id=8a610462"
  ></script>

  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != "dataLayer" ? "&l=" + l : "";
      j.async = true;
      j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-MF544WZ");
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Tag Manager (noscript) -->
  <noscript
    ><iframe
      src="https://www.googletagmanager.com/ns.html?id=GTM-MF544WZ"
      height="0"
      width="0"
      style="display: none; visibility: hidden"
    ></iframe
  ></noscript>
  <!-- End Google Tag Manager (noscript) -->
</head>
