<?php
namespace App;

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

class Application extends BaseApplication
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap()
    {
        parent::bootstrap();

        // CLI の場合は CLI 用プラグインを読み込む
        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        // デバッグモードの場合は DebugKit を読み込む
        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }
    }

    /**
     * CLI 用のプラグインを読み込む
     */
    protected function bootstrapCli()
{
    try {
        $this->addPlugin('Bake');
    } catch (MissingPluginException $e) {
        // プラグインが無くても処理を止めない
    }

    // Migrations プラグインを追加
    $this->addPlugin('Migrations');
}


    /**
     * ミドルウェアの設定
     */
    public function middleware($middlewareQueue)
    {
        $middlewareQueue
            ->add(new ErrorHandlerMiddleware(null, Configure::read('Error')))
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))
            ->add(new RoutingMiddleware($this));

        return $middlewareQueue;
    }
}
