<!DOCTYPE html>
<html lang="en">
<body>

<?php
interface HasBios {
    public function biosConfig();
}

trait greeting {
    public function grt() {
        echo '<h2>Hello! Wish you best experience using this device.</h2>';
    }
}
class Computer implements HasBios {
    public $cpu, $gpu, $ram;
    use greeting;

    function __construct($cpu, $gpu, $ram) {
        $this->set_cpu($cpu);
        $this->set_gpu($gpu);
        $this->set_ram($ram);
        $this->grt();
        $this->biosConfig();
    }
    function __destruct() {
        echo '<h2>The PC is no more!</h2>';
    }
    function get_cpu() {
        return $this->cpu;
    }
    function get_gpu() {
        return $this->gpu;
    }
    function get_ram() {
        return $this->ram;
    }

    function set_cpu($cpu) {
        $this->cpu = $cpu;
    }
    function set_gpu($gpu) {
        $this->gpu = $gpu;
    }
    function set_ram($ram) {
        $this->ram = $ram;
    }

    function biosConfig() {
        echo '<h2>Your CPU, GPU and RAM settings have to be configured.</h2>';
    }
}

$pc = new Computer("core i5 11600k", "RTX 3080", "Crucial DDR4 3200Mhz 16GB");
echo '<h2>This is a PC. CPU: ', $pc->get_cpu(), ', GPU: ', $pc->get_gpu(), ', RAM: ', $pc->get_ram(), '.</h2><br>';
$pc->set_cpu("core i7 11700k");
echo '<h2>Ooops. Actually, CPU is ', $pc->get_cpu(), '.</h2>';
echo '<br><br>';

class Laptop extends Computer {
    public $screenResolution, $screenSize, $battery;
    function __construct($cpu, $gpu, $ram, $screenResolution, $screenSize, $battery) {
        parent::__construct($cpu, $gpu, $ram);
        $this->set_screenResolution($screenResolution);
        $this->set_screenSize($screenSize);
        $this->set_battery($battery);
    }
    function __destruct() {
        echo '<h2>The laptop is no more</h2>';
    }

    function get_screenResolution() {
        return $this->screenResolution;
    }
    function get_screenSize() {
        return $this->screenSize;
    }
    function get_battery() {
        return $this->battery;
    }

    function set_screenResolution($screenResolution) {
        $this->screenResolution = $screenResolution;
    }
    function set_screenSize($screenSize) {
        $this->screenSize = $screenSize;
    }
    function set_battery($battery) {
        $this->battery = $battery;
    }

    function biosConfig() {
        echo '<h2>Your CPU, GPU, RAM, screen and battery settings have to be configured.</h2>';
    }
}

$laptop = new Laptop("core i5 10510u", "mx 250", "LPDDR3 8GB", "fullHD", "15.6 inches", "60W*h");
echo '<h2>This is a laptop. CPU: ', $laptop->get_cpu(), ', GPU: ', $laptop->get_gpu(), ', RAM: ', $laptop->get_ram(),
', Screen Resolution: ', $laptop->get_screenResolution(), ', Screen Size: ', $laptop->get_screenSize(), ', Battery: ', $laptop->get_battery(), '.</h2><br>';
?>

</body>
</html>
