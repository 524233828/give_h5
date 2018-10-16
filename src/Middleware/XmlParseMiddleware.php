<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/10/16
 * Time: 10:00
 */

namespace Middleware;


use FastD\Middleware\DelegateInterface;
use FastD\Middleware\Middleware;
use Psr\Http\Message\ServerRequestInterface;

class XmlParseMiddleware extends Middleware
{
    public function handle(ServerRequestInterface $request, DelegateInterface $next)
    {
        // TODO: Implement handle() method.

        $xml = XML::parse(strval($this->request->getContent()));
    }
}