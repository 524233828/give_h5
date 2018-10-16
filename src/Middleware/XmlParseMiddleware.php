<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/10/16
 * Time: 10:00
 */

namespace Middleware;


use EasyWeChat\Support\XML;
use FastD\Middleware\DelegateInterface;
use FastD\Middleware\Middleware;
use Psr\Http\Message\ServerRequestInterface;

class XmlParseMiddleware extends Middleware
{
    public function handle(ServerRequestInterface $request, DelegateInterface $next)
    {
        // TODO: Implement handle() method.

        $log = myLog("xmlParse");
        $content_type = $request->getHeaderLine("content_type");
        $log->addDebug("content_type:{$content_type}");
        if($content_type == "text/xml"){
            $body = (string)$request->getBody();
            $log->addDebug("body:{$body}");

            $params = XML::parse(strval($body));
            $log->addDebug("params:", $params);
            if($params){
                $request->withQueryParams($params);
            }
        }

        $response = $next->process($request);
    
        return $response;

    }
}