<?php

namespace AnilcanCakir\Former\Tests;

use AnilcanCakir\Former\Contracts\Former as FormerContract;
use AnilcanCakir\Former\Contracts\FormerHelper as FormerHelperContract;
use AnilcanCakir\Former\Former;
use AnilcanCakir\Former\FormerHelper;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * The view contract.
     *
     * @var Factory|MockInterface
     */
    private $view;

    /**
     * The translator contract.
     *
     * @var Translator|MockInterface
     */
    private $translator;

    /**
     * The config contract.
     *
     * @var Repository|MockInterface
     */
    private $config;

    /**
     * The url contract.
     *
     * @var UrlGenerator|MockInterface
     */
    private $url;

    /**
     * The formerHelper contract.
     *
     * @var FormerHelperContract
     */
    private $formerHelper;

    /**
     * The former contract.
     *
     * @var FormerContract
     */
    private $former;

    /**
     * Get the view mocked instance.
     *
     * @return Factory|MockInterface
     */
    protected function view()
    {
        if (!$this->view) {
            $this->view = Mockery::mock(Factory::class);
        }

        return $this->view;
    }

    /**
     * Get the translator mocked instance.
     *
     * @return Translator|MockInterface
     */
    protected function translator()
    {
        if (!$this->translator) {
            $this->translator = Mockery::mock(Translator::class);
        }

        return $this->translator;
    }


    /**
     * Get the config mocked instance.
     *
     * @return Repository|MockInterface
     */
    protected function config()
    {
        if (!$this->config) {
            $this->config = Mockery::mock(Repository::class);
        }

        return $this->config;
    }

    /**
     * Get the url mocked instance.
     *
     * @return UrlGenerator|MockInterface
     */
    protected function url()
    {
        if (!$this->url) {
            $this->url = Mockery::mock(UrlGenerator::class);
        }

        return $this->url;
    }

    /**
     * Get former helper instance.
     *
     * @return FormerHelperContract|FormerHelper
     */
    protected function formerHelper()
    {
        if (!$this->formerHelper) {
            $this->formerHelper = new FormerHelper(
                $this->view(), $this->translator(), $this->config(), $this->url()
            );
        }

        return $this->formerHelper;
    }

    /**
     * Get former instance.
     *
     * @return FormerContract|Former
     */
    protected function former()
    {
        if (!$this->former) {
            $this->former = new Former(
                $this->formerHelper()
            );
        }

        return $this->former;
    }

    /**
     * Close mocks when down.
     */
    public function tearDown()
    {
        Mockery::close();
    }
}