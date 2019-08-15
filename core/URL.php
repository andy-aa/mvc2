<?php


class URL
{
    use SingletonTrait,
        DispatcherTrait;


    public function decodeUri($uri)
    {
        foreach ($this->dispatcher as $pattern => $handler) {
            if (preg_match_all($this->getRegExp($pattern), $uri)) {

                return ['handler' => $handler, 'vars' => $this->getVars($pattern, $uri)];
            }
        }

        return null;
    }

    public function getRegExp($pattern)
    {

        $pattern = preg_replace(
            "~\{[0-9A-Za-z]+\}~i",
            "([0-9A-Za-z]+)",
            $pattern
        );

        return "~^/$pattern$~i";
    }

    public function getVars($pattern, $uri)
    {
        preg_match_all(
            "~\{([0-9A-Za-z]+)\}~i",
            $pattern,
            $match
        );

        $varNames = $match[1];

        preg_match_all(
            $this->getRegExp($pattern),
            $uri,
            $varValues
        );

        array_shift($varValues);

        $vars = [];
        foreach ($varNames as $key => $value) {
            $vars[$value] = $varValues[$key][0];
        }

        return $vars;
    }

    public function to($handler, $vars = [])
    {
        if (Conf::CLEAN_URL) {
            return '/' . preg_replace(

                    preg_replace(
                        "~^.*$~i",
                        "~\{$0\}~i",
                        array_keys($vars)
                    ),

                    $vars,

//            array_search(
//                $handler,
//                $this->routs
//            )

                    array_search(
                        strtolower($handler),
                        array_map(
                            'strtolower',
                            $this->dispatcher
                        )
                    )

                );
        } else {
            $handler = explode('/', $handler);

            return "?t=$handler[0]&a=$handler[0]&" . http_build_query($vars);
        }


    }

}
