<?php
    header("Content-type: text/html; charset=utf-8");
    if(@isset($_POST['input']))
    {
        $input = $_POST['input'];
        if (stripos($input, 'http://') === 0 && stripos($input, '127.0.0.1') === False && stripos($input, 'localhost') === False)
        {
          $curlobj = curl_init($input);
          curl_setopt($curlobj, CURLOPT_HEADER, 0);
          curl_setopt($curlobj, CURLOPT_PROTOCOLS, CURLPROTO_HTTP);
          curl_setopt($curlobj, CURLOPT_CONNECTTIMEOUT, 10);
          curl_setopt($curlobj, CURLOPT_TIMEOUT, 5);
          $html = curl_exec($curlobj);
          curl_close($curlobj);
        }
        else if (stripos($input, 'file:///etc/php5/fpm/pool.d/www.conf') === 0)
        {
          $html = "; By default the status page output is formatted as text/plain. Passing either
; 'html' or 'json' as a query string will return the corresponding output
; syntax. Example:
;   http://www.foo.bar/status
;   http://www.foo.bar/status?json
;   http://www.foo.bar/status?html
; Note: The value must start with a leading slash (/). The value can be
;       anything, but it may not be a good idea to use the .php extension or it
;       may conflict with a real PHP file.
; Default Value: not set 
;pm.status_path = /status
 
; The ping URI to call the monitoring page of FPM. If this value is not set, no
; URI will be recognized as a ping page. This could be used to test from outside
; that FPM is alive and responding, or to
; - create a graph of FPM availability (rrd or such);
; - remove a server from a group if it is not responding (load balancing);
; - trigger alerts for the operating team (24/7).
; Note: The value must start with a leading slash (/). The value can be
;       anything, but it may not be a good idea to use the .php extension or it
;       may conflict with a real PHP file.
; Default Value: not set
;ping.path = /ping

; This directive may be used to customize the response of a ping request. The
; response is formatted as text/plain with a 200 response code.
; Default Value: pong
;ping.response = pong
 
; The timeout for serving a single request after which the worker process will
; be killed. This option should be used when the 'max_execution_time' ini option
; does not stop script execution for some reason. A value of '0' means 'off'.
; Available units: s(econds)(default), m(inutes), h(ours), or d(ays)
; Default Value: 0
;request_terminate_timeout = 0
 
; The timeout for serving a single request after which a PHP backtrace will be
; dumped to the 'slowlog' file. A value of '0s' means 'off'.
; Available units: s(econds)(default), m(inutes), h(ours), or d(ays)
; Default Value: 0
;request_slowlog_timeout = 0
 
; The log file for slow requests
; Default Value: not set
; Note: slowlog is mandatory if request_slowlog_timeout is set
slowlog = /var/log/php-fpm/www-slow.log
 
; Set open file descriptor rlimit.
; Default Value: system defined value
;rlimit_files = 1024
 
; Set max core size rlimit.
; Possible Values: 'unlimited' or an integer greater or equal to 0
; Default Value: system defined value
;rlimit_core = 0
 
; Chroot to this directory at the start. This value must be defined as an
; absolute path. When this value is not set, chroot is not used.
; Note: chrooting is a great security feature and should be used whenever 
;       possible. However, all PHP paths will be relative to the chroot
;       (error_log, sessions.save_path, ...).
; Default Value: not set
;chroot = 
 
; Chdir to this directory at the start. This value must be an absolute path.
; Default Value: current directory or / when chroot
;chdir = /var/www
 
; Redirect worker stdout and stderr into main error log. If not set, stdout and
; stderr will be redirected to /dev/null according to FastCGI specs.
; Default Value: no
;catch_workers_output = yes
 
; Limits the extensions of the main script FPM will allow to parse. This can
; prevent configuration mistakes on the web server side. You should only limit
; FPM to .php extensions to prevent malicious users to use other extensions to
; exectute php code.
; Note: set an empty value to allow all extensions.
; Default Value: .php
security.limit_extensions = .php .php3 .php4 .php5 .wind

; Pass environment variables like LD_LIBRARY_PATH. All \$VARIABLEs are taken from
; the current environment.
; Default Value: clean env
;env[HOSTNAME] = \$HOSTNAME
;env[PATH] = /usr/local/bin:/usr/bin:/bin
;env[TMP] = /tmp
;env[TMPDIR] = /tmp
;env[TEMP] = /tmp

; Additional php.ini defines, specific to this pool of workers. These settings
; overwrite the values previously defined in the php.ini. The directives are the
; same as the PHP SAPI:
;   php_value/php_flag             - you can set classic ini defines which can
";
        }
        else if (stripos($input, 'file://') === 0)
        {
          $html = 'No permission, only one file has permission to load.';
        }
        @print $html;
    }
    else
    {
      @print<<<HTML
      <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Where CMS is?</title>
  <script src="js/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>

  </head>


  <body style="margin:300 auto;width:600px;">
    <form role="form" action = "" method="POST">
      <div class="form-group">
        <label class="sr-only" for="name">to where?</label>
        <input type="text" style="width:50%" class="form-control" name="input" placeholder="To where?">
      </div>
    <button type="submit" class="btn btn-info">there</button>
  </body>
HTML;
    }
?>


