<?php
namespace App\Listener;

use Cake\Controller\Controller;
use Cake\Controller\ErrorController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\I18n\I18n;
use Locale;

class ViewVarsListener implements EventListenerInterface
{

    public $controller;

    public function implementedEvents()
    {
        return ['Controller.beforeRender' => 'beforeRender'];
    }

    public function beforeRender(Event $event)
    {
        $this->controller = $event->subject();

        $this->controller->set('brand', $this->brand());

        $this->_set('htmlLang', $this->lang());
        $this->_set('htmlTitle', $this->title());
        $this->_set('metaAuthor', $this->author());
    }

    public function brand()
    {
        return read('App.title');
    }

    public function author()
    {
        return read('App.author');
    }

    public function lang()
    {
        return Locale::getPrimaryLanguage(I18n::locale());
    }

    public function title()
    {
        $title = read('App.title');

        if ($this->controller instanceof ErrorController) {
            $title = sprintf(
                '%s %s - %s',
                $this->controller->viewVars['code'],
                $this->controller->viewVars['message'],
                $title
            );
        }

        return $title;
    }

    protected function _set($name, $value)
    {
        if (!array_key_exists($name, $this->controller->viewVars)) {
            $this->controller->set($name, $value);
        }
    }
}