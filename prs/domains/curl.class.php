<?php

/**
 * ООП надстройка над библиотекой curl
 */
class cURL
{

    /**
     * Объект класса курл
     * @var object
     */
    protected $curl;
    /**
     * Содержимое результата
     * @var string
     */
    public $content;
    public $cookieFolder = "cookie";
    /**
     * Массив User_Agent'ов
     * @var array of string
     */
    protected $userAgents = array(
        "mozilla" => "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.1) Gecko/20090715 Firefox/3.5.1 (.NET CLR 3.5.30729)"
    );
    /**
     * Массив заголовков http запроса
     * @var array of string
     */
    protected $headers = array(
        "",
        "Accept: application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
        "Accept-Encoding: gzip,deflate",
        "Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4",
        "Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.3",
        "Content-Type: application/x-www-form-urlencoded",
        "Keep-Alive: 300"
    );
    public $used_proxy = false;

    function __construct($timeout = 90, $headers = false)
    {
        $this->initCurl($timeout)
                ->setMethod("GET")
                ->setHeaders()
                ->setUserAgent()
                ->needHeader($headers);
    }

    
    function setFollowLocation($value = 0) {
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, $value); 
        return $this;
    }
    
    /**
     * Устанавливает заголовки http запроса
     * @return this
     */
    function setHeaders($headers = "")
    {
        if ($headers == "")
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);
        else
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
        return $this;
    }

    function setProxy($proxy, $type = 1)
    {
        if ($type == 0)
            curl_setopt($this->curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        curl_setopt($this->curl, CURLOPT_PROXY, $proxy);

        return $this;
    }

    function setAuthProxy($proxy, $login, $pass)
    {
        $this->used_proxy = true;
        curl_setopt($this->curl, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        curl_setopt($this->curl, CURLOPT_PROXY, "$proxy");
        $answer = curl_setopt($this->curl, CURLOPT_PROXYUSERPWD, "$login:$pass");
        curl_setopt($this->curl, CURLOPT_PROXYAUTH, 1);

        return $answer;
    }

    function &getCurlObject()
    {
        return $this->curl;
    }

    function getErrors()
    {
        echo "\n\ncURL error number:" . curl_errno($this->curl);
        echo "\n\ncURL error:" . curl_error($this->curl);
    }

    /**
     * Устанавливает юзер-агент
     * @param string $userAgent индификатор юзер-агента
     * @return this
     */
    function setUserAgent($userAgent = "mozilla")
    {
        curl_setopt($this->curl, CURLOPT_USERAGENT, $this->userAgents[$userAgent]);
        return $this;
    }

    /**
     * Устанавливает http-referer
     * @param string $referer url реферера
     * @return this
     */
    function setReferer($referer)
    {
        curl_setopt($this->curl, CURLOPT_REFERER, $referer);
        return $this;
    }

    /**
     * Устанавивает файл для принятия и отправки куков
     * @param string $cookieFile имя файла куков без расширения
     * @return this
     */
    function setCookies($cookieFile)
    {
        $cookieFile = $this->getPathToAcc($cookieFile);
        curl_setopt($this->curl, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($this->curl, CURLOPT_COOKIEFILE, $cookieFile);
        return $this;
    }

    /**
     * Удаляет файл куков
     * @param string $cookieFile имя файлов куков без расширения
     */
    function delCookies($cookieFile)
    {
        $cookieFile = $this->getPathToAcc($cookieFile);
        clearstatcache();
        if (file_exists($cookieFile)) {
            unlink($cookieFile);
        }
        return $this;
    }

    /**
     * Меняет куки
     * @param string $oldCookie имя текущих куков
     * @return string имя файла новых куков
     */
    function changeCookie($oldCookie)
    {
        $newCookie = "cookie" . rand(1000, 9999) . "txt";
        $this->setCookies($newCookie);
        $this->delCookies($oldCookie);
        return $newCookie;
    }

    /**
     * ??нициализация объекта curl
     * @return this
     */
    function initCurl($timeout)
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($this->curl, CURLOPT_ENCODING, 0);
        return $this;
    }

    /**
     * Нужны или нет заголовки в ответе
     * @param bool $bool
     * @return this
     */
    function needHeader($bool)
    {
        curl_setopt($this->curl, CURLOPT_HEADER, $bool);
        return $this;
    }

    /**
     * Устанавливает урл для запроса
     * @param string $url урл
     * @return this
     */
    function setURL($url)
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
        return $this;
    }

    /**
     * Устанавливает метод для отправки
     * @param string $method вид метода
     * @return this
     */
    function setMethod($method = "GET")
    {
        if ($method == "POST") {
            curl_setopt($this->curl, CURLOPT_POST, 1);
        } else {
            curl_setopt($this->curl, CURLOPT_POST, 0);
        }
        return $this;
    }

    /**
     * Включить\выключить HTTPS
     * @param bool $bool
     */
    function setHTTPS($peer = 0, $host = 0, $version = "")
    {
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, $peer);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, $host);
        if ($version != "")
            curl_setopt($this->curl, CURLOPT_SSLVERSION, $version);
        return $this;
    }

    function setCert($pem)
    {
        curl_setopt($this->curl, CURLOPT_VERBOSE, 1);
        curl_setopt($this->curl, CURLOPT_CAINFO, $this->getPathToAcc($pem));
        return $this;
    }

    /**
     * Выполняет запрос
     * @return string
     */
    function curlExec()
    {
        $this->content = curl_exec($this->curl);
        if ($this->content == false)
            echo "Curl error " . curl_error($this->curl);
        return $this->content;
    }

    /**
     * Возвращает абсолютный путь к файлу для данной ОС
     * @param string $folder имя папки
     * @param string $name имя файла
     * @return string абсолютный путь к файлу
     */
    static function getPathToAcc($name)
    {
        $path = getcwd() . '/' . $name;
        if (substr(PHP_OS, 0, 3) == 'WIN') {
            $path = str_replace('/', '\\', $path);
        } else {
            $path = str_replace('\\', '/', $path);
        }
        return $path;
    }

    /**
     * Устанавливает поля для POST запроса
     * @param array $fields поля пост запроса
     * @return this
     */
    function setPostFields(array $fields)
    {
        $str = "";
        foreach ($fields as $key => $field) {
            if (is_array($field)) {
                foreach ($field as $i => $v) {
                    $str .= urlencode($key) . "[]=" . urlencode($v);
                    $str .= "&";
                }
            } else {
                $str .= urlencode($key) . "=" . urlencode($field);
                $str .= "&";
            }
        }
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $str);
        return $this;
    }

    function __destruct()
    {
        curl_close($this->curl);
    }

}