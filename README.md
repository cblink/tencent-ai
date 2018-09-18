```php
use Cblink\TencentAI\Application;

require 'vendor/autoload.php';

$app = new Application([
    'app_id' => 'xxxxxx',
    'app_key' => 'xxxxxx',
]);

## 智能鉴黄
$app->visionPorn(file_get_contents('path/to/image.jpeg'));
```
