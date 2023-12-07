<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TJSL
        </title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

        <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css?v=3.2.0">
        <script nonce="0f75e749-c7aa-406e-ac35-82af55ac2673">
                (function(w, d) {
                        ! function(db, dc, dd, de) {
                                db[dd] = db[dd] || {};
                                db[dd].executed = [];
                                db.zaraz = {
                                        deferred: [],
                                        listeners: []
                                };
                                db.zaraz.q = [];
                                db.zaraz._f = function(df) {
                                        return async function() {
                                                var dg = Array.prototype.slice.call(arguments);
                                                db.zaraz.q.push({
                                                        m: df,
                                                        a: dg
                                                })
                                        }
                                };
                                for (const dh of ["track", "set", "debug"]) db.zaraz[dh] = db.zaraz._f(dh);
                                db.zaraz.init = () => {
                                        var di = dc.getElementsByTagName(de)[0],
                                                dj = dc.createElement(de),
                                                dk = dc.getElementsByTagName("title")[0];
                                        dk && (db[dd].t = dc.getElementsByTagName("title")[0].text);
                                        db[dd].x = Math.random();
                                        db[dd].w = db.screen.width;
                                        db[dd].h = db.screen.height;
                                        db[dd].j = db.innerHeight;
                                        db[dd].e = db.innerWidth;
                                        db[dd].l = db.location.href;
                                        db[dd].r = dc.referrer;
                                        db[dd].k = db.screen.colorDepth;
                                        db[dd].n = dc.characterSet;
                                        db[dd].o = (new Date).getTimezoneOffset();
                                        if (db.dataLayer)
                                                for (const dp of Object.entries(Object.entries(dataLayer).reduce(((dq, dr) => ({
                                                                ...dq[1],
                                                                ...dr[1]
                                                        })), {}))) zaraz.set(dp[0], dp[1], {
                                                        scope: "page"
                                                });
                                        db[dd].q = [];
                                        for (; db.zaraz.q.length;) {
                                                const ds = db.zaraz.q.shift();
                                                db[dd].q.push(ds)
                                        }
                                        dj.defer = !0;
                                        for (const dt of [localStorage, sessionStorage]) Object.keys(dt || {}).filter((dv => dv.startsWith("_zaraz_"))).forEach((du => {
                                                try {
                                                        db[dd]["z_" + du.slice(7)] = JSON.parse(dt.getItem(du))
                                                } catch {
                                                        db[dd]["z_" + du.slice(7)] = dt.getItem(du)
                                                }
                                        }));
                                        dj.referrerPolicy = "origin";
                                        dj.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(db[dd])));
                                        di.parentNode.insertBefore(dj, di)
                                };
                                ["complete", "interactive"].includes(dc.readyState) ? zaraz.init() : db.addEventListener("DOMContentLoaded", zaraz.init)
                        }(w, d, "zarazData", "script");
                })(window, document);
        </script>
</head>

<body class="hold-transition login-page">
        <div class="login-box">
                <div class="login-logo">
                        <img src="<?= base_url(); ?>/template/dist/img/AdminLTELogo.png" class="img-circle "">
                        <a href=" ../../index2.html"><b>TJSL</b> PT INTI</a>
                </div>

                <div class="card">
                        <div class="card-body login-card-body">

                                <?php if (!empty(session()->getFlashdata('gagal'))) { ?>

                                        <div class="alert alert-danger">
                                                <?php echo session()->getFlashdata('gagal'); ?>
                                        </div>
                                <?php } ?>

                                <?php
                                echo form_open('login/cek_login')
                                ?>
                                <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                        <div class="input-group-append">
                                                <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                </div>
                                        </div>
                                </div>
                                <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <div class="input-group-append">
                                                <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-8">
                                                <div class="icheck-primary">
                                                        <input type="checkbox" id="remember">
                                                        <label for="remember">
                                                                Remember Me
                                                        </label>
                                                </div>
                                        </div>

                                        <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block">Sign
                                                        In</button>
                                        </div>

                                </div>
                                <?php echo form_close(); ?>
                        </div>

                </div>
        </div>


        <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>

        <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>