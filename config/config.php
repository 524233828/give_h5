<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

return [
    "default_avatar" => "https://a.ym8800.com/upload/795c69b14e3756d2061f97264872e82b.png",

    "payment" => [
        // 微信支付参数
        'wechat' => [
            'debug'      => false, // 沙箱模式
            'app_id'     => 'wx45d4e558ae0284a4', // 应用ID
            'mch_id'     => '1493544892', // 微信支付商户号
            'mch_key'    => 'yaoyuan123*', // 微信支付密钥
            'ssl_cer'    => '', // 微信证书 cert 文件
            'ssl_key'    => '', // 微信证书 key 文件
            'notify_url' => '', // 支付通知URL
            'cache_path' => '',// 缓存目录配置（沙箱模式需要用到）
        ],
        // 支付宝支付参数
        'alipay' => [
            'debug'       => false, // 沙箱模式
            'app_id'      => '2018090461274322', // 应用ID
            'public_key'  => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjpxwD/cvD+pCDVMj5E/XOAZXLXCAS7We5lAKqDiKmAvCO0ImQcwtRcnkL94lkK4GZVUJgbk+aG3S+YqwNcMzvqtqROi1RE7ZgNpszQeppB1YSMKrZ0Zyp7ntjTwidsL+4h7JUjZ/KgrjdiNGn5Emqw3xB4+Kwqh1J+WnRaJx20lyY9Em8XLSupdHnJ7/XU3XTNQi7jmMwd+ra4/nuqo3YAKpX82m1bCeUZnHg5oAz6NuDpuSo8DzMMP4UAV364oku5Ro8pxJwB4GcEtOC2nNJ6A/TSSFiNbZAqJvcehUnC8yB9f6VL44FtFBO6hQ7LsStDNRKiUGAel5DMd4aDa71wIDAQAB', // 支付宝公钥(1行填写)
            'private_key' => "MIIEpAIBAAKCAQEAslJgaAaIEM7vVbb7OWosSPc3ObhniZtZI85BPYQtKNb52wOEtIEKsKQBu2KDV5k3E0LR6p+5bQqWI0u4ysONH7gLBoSHN4p7+uvK8pfqZDyv6SSQlgS7I3AxvY6Vw2nMN1YgeR85e8HSusiygpzM18JGPMkapB+/moqhsN9rRNeiMytUt/3+3NKwd6PORrvGNZhFcu3f+c36LBZdAY2+wOLcNJR7FiSqN9RVRlFC+4NDZWEKHHZwtbo+KhdYQdR4JLIa27rymysP0RWwDs1uFlGttJN0XvS9jEJPwOtFhEAnBD932ZLPffmb+zh6jpWX2f6x+vON1hQeBDLsOPpoQwIDAQABAoIBAQCZoc07cn0h9hdPQtHY2neC+bKTwSM69CNtbNLafBkoOWaUYcigdxjNrM9tMOe1veQsbQJL4QaxQlCt4hw4XRgl/rtJBz80A9TjDukP7wBbEcoA1KbZCQRt+Mhx5vlynaD6//IESHmO/SNgF29shkkZjmBTGHQieNPsAophx2s0qB1nRE+KccASGeyznwJ5+HgPga+MgprVUUJRJS4OeEDIQq4kjObVWmEq2HobCoGXHFoQO08oQncEEIGB1Bpn/HneC6deV++/A267Zsl59N3csnl5kLcsZ57d3XzXk/NubGIFucmgZb/bBDn+AhMBQXKMKSRx7r58D1y9vImZFGRJAoGBAOquat/JILTsbYMXv5buEJ93HHsoQr0/gNxj/RijzdUs/+8RA+Cm/wL4dKwNV/5r46tHGTg2jzJqiuTwJAP0DhZoOlHFstxvHn1Z5X0TPHEygb1q2SXoIeWOYS+ajGikRDm7ttnL7YRoHUFqth2MqpJS8hxuwo4fEvJFKKa8pDj3AoGBAMKFTTtmAGI8s5VnRidIXolhTsJC3EATiIkKDmX1tA4VKR+fkpCRMQWm/CVPRyYmKgc+GRrdYGzgpy/nCkGjHQMyVHWs1WtddY6FlMkEO9Pfj/tnsRTDwH+HG0wiJC4QA1MCyx15cWfdBwSkA5JQ64HzI8buVQ9acwmHNA8ruSQVAoGAPA/5sF6kbUmZWZTJZxJ01KtCcc7DDfZjv4QjsZuywV1r/z6GlIeI+rSl/6bGn4nzUdG3haiJC6ky9Rb00MI0nM1+J5GGjl4uGnzYfCNhM8NuaxEelFIN4teGzg0q5FkuUOxXBvTnTBztZ+GszHFE8oAiEN7UElWnnrPOjKX5Dc8CgYEAmE7t6St183WaG8qwaIPG2gTiOUNG17kzuDGykm0vnbM97u/wP9gfrVBRsBkCGcHaOK+L0rgyDy5cWiqqojhIuD8JWNaKiTW1nXHEzRzOh5hOUcigJCUeLfypCBTXhWWuZKoURjDX9j5fh2exEDjiHm81vUbSPWJSHszJm3Nd1P0CgYAtO8iuJ1ygmssB1vCO8eb1VEploTjAz+zIWraiHyuh3ZWPWx5FxtmxeTzFefBiKGrC+YCMA2vfNYpkvl3gFXa93Gx/dJxiWHHP8JzaX5UGJKKFSxkxLXjVGmfsAlBWzgUU37evj3U1jl+RP/gwOWejmJbgF5QIx2otcImjPEfT8Q==",
            'notify_url'  => 'http://give_h5.ym8800.com/api/common/notify', // 支付通知URL
        ],

        "alipay_web" => [
            'app_id'      => '2018090461274322', // 应用ID
            'alipay_public_key'  => "-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjpxwD/cvD+pCDVMj5E/XOAZXLXCAS7We5lAKqDiKmAvCO0ImQcwtRcnkL94lkK4GZVUJgbk+aG3S+YqwNcMzvqtqROi1RE7ZgNpszQeppB1YSMKrZ0Zyp7ntjTwidsL+4h7JUjZ/KgrjdiNGn5Emqw3xB4+Kwqh1J+WnRaJx20lyY9Em8XLSupdHnJ7/XU3XTNQi7jmMwd+ra4/nuqo3YAKpX82m1bCeUZnHg5oAz6NuDpuSo8DzMMP4UAV364oku5Ro8pxJwB4GcEtOC2nNJ6A/TSSFiNbZAqJvcehUnC8yB9f6VL44FtFBO6hQ7LsStDNRKiUGAel5DMd4aDa71wIDAQAB\n-----END PUBLIC KEY-----", // 支付宝公钥(1行填写)
            'app_private_key' => "-----BEGIN RSA PRIVATE KEY-----\nMIIEpAIBAAKCAQEAslJgaAaIEM7vVbb7OWosSPc3ObhniZtZI85BPYQtKNb52wOEtIEKsKQBu2KDV5k3E0LR6p+5bQqWI0u4ysONH7gLBoSHN4p7+uvK8pfqZDyv6SSQlgS7I3AxvY6Vw2nMN1YgeR85e8HSusiygpzM18JGPMkapB+/moqhsN9rRNeiMytUt/3+3NKwd6PORrvGNZhFcu3f+c36LBZdAY2+wOLcNJR7FiSqN9RVRlFC+4NDZWEKHHZwtbo+KhdYQdR4JLIa27rymysP0RWwDs1uFlGttJN0XvS9jEJPwOtFhEAnBD932ZLPffmb+zh6jpWX2f6x+vON1hQeBDLsOPpoQwIDAQABAoIBAQCZoc07cn0h9hdPQtHY2neC+bKTwSM69CNtbNLafBkoOWaUYcigdxjNrM9tMOe1veQsbQJL4QaxQlCt4hw4XRgl/rtJBz80A9TjDukP7wBbEcoA1KbZCQRt+Mhx5vlynaD6//IESHmO/SNgF29shkkZjmBTGHQieNPsAophx2s0qB1nRE+KccASGeyznwJ5+HgPga+MgprVUUJRJS4OeEDIQq4kjObVWmEq2HobCoGXHFoQO08oQncEEIGB1Bpn/HneC6deV++/A267Zsl59N3csnl5kLcsZ57d3XzXk/NubGIFucmgZb/bBDn+AhMBQXKMKSRx7r58D1y9vImZFGRJAoGBAOquat/JILTsbYMXv5buEJ93HHsoQr0/gNxj/RijzdUs/+8RA+Cm/wL4dKwNV/5r46tHGTg2jzJqiuTwJAP0DhZoOlHFstxvHn1Z5X0TPHEygb1q2SXoIeWOYS+ajGikRDm7ttnL7YRoHUFqth2MqpJS8hxuwo4fEvJFKKa8pDj3AoGBAMKFTTtmAGI8s5VnRidIXolhTsJC3EATiIkKDmX1tA4VKR+fkpCRMQWm/CVPRyYmKgc+GRrdYGzgpy/nCkGjHQMyVHWs1WtddY6FlMkEO9Pfj/tnsRTDwH+HG0wiJC4QA1MCyx15cWfdBwSkA5JQ64HzI8buVQ9acwmHNA8ruSQVAoGAPA/5sF6kbUmZWZTJZxJ01KtCcc7DDfZjv4QjsZuywV1r/z6GlIeI+rSl/6bGn4nzUdG3haiJC6ky9Rb00MI0nM1+J5GGjl4uGnzYfCNhM8NuaxEelFIN4teGzg0q5FkuUOxXBvTnTBztZ+GszHFE8oAiEN7UElWnnrPOjKX5Dc8CgYEAmE7t6St183WaG8qwaIPG2gTiOUNG17kzuDGykm0vnbM97u/wP9gfrVBRsBkCGcHaOK+L0rgyDy5cWiqqojhIuD8JWNaKiTW1nXHEzRzOh5hOUcigJCUeLfypCBTXhWWuZKoURjDX9j5fh2exEDjiHm81vUbSPWJSHszJm3Nd1P0CgYAtO8iuJ1ygmssB1vCO8eb1VEploTjAz+zIWraiHyuh3ZWPWx5FxtmxeTzFefBiKGrC+YCMA2vfNYpkvl3gFXa93Gx/dJxiWHHP8JzaX5UGJKKFSxkxLXjVGmfsAlBWzgUU37evj3U1jl+RP/gwOWejmJbgF5QIx2otcImjPEfT8Q==\n-----END RSA PRIVATE KEY-----",
        ],

        "alipay_wap" => [
            'app_id'      => '2018090461274322', // 应用ID
            'alipay_public_key'  => "-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjpxwD/cvD+pCDVMj5E/XOAZXLXCAS7We5lAKqDiKmAvCO0ImQcwtRcnkL94lkK4GZVUJgbk+aG3S+YqwNcMzvqtqROi1RE7ZgNpszQeppB1YSMKrZ0Zyp7ntjTwidsL+4h7JUjZ/KgrjdiNGn5Emqw3xB4+Kwqh1J+WnRaJx20lyY9Em8XLSupdHnJ7/XU3XTNQi7jmMwd+ra4/nuqo3YAKpX82m1bCeUZnHg5oAz6NuDpuSo8DzMMP4UAV364oku5Ro8pxJwB4GcEtOC2nNJ6A/TSSFiNbZAqJvcehUnC8yB9f6VL44FtFBO6hQ7LsStDNRKiUGAel5DMd4aDa71wIDAQAB\n-----END PUBLIC KEY-----", // 支付宝公钥(1行填写)
            'app_private_key' => "-----BEGIN RSA PRIVATE KEY-----\nMIIEpAIBAAKCAQEAslJgaAaIEM7vVbb7OWosSPc3ObhniZtZI85BPYQtKNb52wOEtIEKsKQBu2KDV5k3E0LR6p+5bQqWI0u4ysONH7gLBoSHN4p7+uvK8pfqZDyv6SSQlgS7I3AxvY6Vw2nMN1YgeR85e8HSusiygpzM18JGPMkapB+/moqhsN9rRNeiMytUt/3+3NKwd6PORrvGNZhFcu3f+c36LBZdAY2+wOLcNJR7FiSqN9RVRlFC+4NDZWEKHHZwtbo+KhdYQdR4JLIa27rymysP0RWwDs1uFlGttJN0XvS9jEJPwOtFhEAnBD932ZLPffmb+zh6jpWX2f6x+vON1hQeBDLsOPpoQwIDAQABAoIBAQCZoc07cn0h9hdPQtHY2neC+bKTwSM69CNtbNLafBkoOWaUYcigdxjNrM9tMOe1veQsbQJL4QaxQlCt4hw4XRgl/rtJBz80A9TjDukP7wBbEcoA1KbZCQRt+Mhx5vlynaD6//IESHmO/SNgF29shkkZjmBTGHQieNPsAophx2s0qB1nRE+KccASGeyznwJ5+HgPga+MgprVUUJRJS4OeEDIQq4kjObVWmEq2HobCoGXHFoQO08oQncEEIGB1Bpn/HneC6deV++/A267Zsl59N3csnl5kLcsZ57d3XzXk/NubGIFucmgZb/bBDn+AhMBQXKMKSRx7r58D1y9vImZFGRJAoGBAOquat/JILTsbYMXv5buEJ93HHsoQr0/gNxj/RijzdUs/+8RA+Cm/wL4dKwNV/5r46tHGTg2jzJqiuTwJAP0DhZoOlHFstxvHn1Z5X0TPHEygb1q2SXoIeWOYS+ajGikRDm7ttnL7YRoHUFqth2MqpJS8hxuwo4fEvJFKKa8pDj3AoGBAMKFTTtmAGI8s5VnRidIXolhTsJC3EATiIkKDmX1tA4VKR+fkpCRMQWm/CVPRyYmKgc+GRrdYGzgpy/nCkGjHQMyVHWs1WtddY6FlMkEO9Pfj/tnsRTDwH+HG0wiJC4QA1MCyx15cWfdBwSkA5JQ64HzI8buVQ9acwmHNA8ruSQVAoGAPA/5sF6kbUmZWZTJZxJ01KtCcc7DDfZjv4QjsZuywV1r/z6GlIeI+rSl/6bGn4nzUdG3haiJC6ky9Rb00MI0nM1+J5GGjl4uGnzYfCNhM8NuaxEelFIN4teGzg0q5FkuUOxXBvTnTBztZ+GszHFE8oAiEN7UElWnnrPOjKX5Dc8CgYEAmE7t6St183WaG8qwaIPG2gTiOUNG17kzuDGykm0vnbM97u/wP9gfrVBRsBkCGcHaOK+L0rgyDy5cWiqqojhIuD8JWNaKiTW1nXHEzRzOh5hOUcigJCUeLfypCBTXhWWuZKoURjDX9j5fh2exEDjiHm81vUbSPWJSHszJm3Nd1P0CgYAtO8iuJ1ygmssB1vCO8eb1VEploTjAz+zIWraiHyuh3ZWPWx5FxtmxeTzFefBiKGrC+YCMA2vfNYpkvl3gFXa93Gx/dJxiWHHP8JzaX5UGJKKFSxkxLXjVGmfsAlBWzgUU37evj3U1jl+RP/gwOWejmJbgF5QIx2otcImjPEfT8Q==\n-----END RSA PRIVATE KEY-----",
            'notify_url'  => 'http://give_h5.ym8800.com/api/common/notify', // 支付通知URL
        ],

        "wechat_h5" => [
            'app_id'     => 'wx38dd89afcc42c109', // 应用ID
            'mch_id'     => '1514441561', // 微信支付商户号
            'mch_secret' => '2yaoyuan1367890POIMNBHYTSGBHJK67', // 微信支付密钥
            "notify_url" => 'http://give_h5.ym8800.com/api/common/notify'
        ],

        "wechat_official" => [
            'app_id'     => 'wx38dd89afcc42c109', // 应用ID
            'app_secret'     => 'f354f76c3c06fa8ba45e47ded09dd677', // 应用ID
            'mch_id'     => '1514441561', // 微信支付商户号
            'mch_secret' => '2yaoyuan1367890POIMNBHYTSGBHJK67', // 微信支付密钥
            "notify_url" => 'http://give_h5.ym8800.com/api/common/notify'
        ],
    ],
];