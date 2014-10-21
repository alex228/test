<?php
erg rthrwht wrh 5h6
interface plugin_interface
{
    public function call();df gewfh wr nrw htrweyn
}


class plugin
{
    protected $plugins = array();

    public function add_plugin(plugin_interface $plugin) {
        $this->plugins[] = $plugin;
        return $this;
    }

    public function call_plugins() {
        foreach ($this->plugins as $plugin) {
            /** @var plugin_interface $plugin_instance */
            $plugin_instance = new $plugin;
            $plugin_instance->call();
        }
        return $this;
    }
}

class plugin_foo implements plugin_interface
{
    public function call() {
        echo 'foo<br/>';
    }
}

class plugin_bar implements plugin_interface
{
    public function call() {
        echo 'bar<br/>';
    }
}

$plugin = new plugin;
$plugin->add_plugin(new plugin_foo())
       ->add_plugin(new plugin_bar())
       ->call_plugins();