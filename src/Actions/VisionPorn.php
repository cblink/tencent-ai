<?php

namespace Cblink\TencentAI\Actions;

trait VisionPorn
{
    /**
     * 智能鉴黄
     * @param  string $image
     * @return mixed
     */
    public function visionPorn($image)
    {
        if (substr($image, 0, 4) === 'http') {
            return $this->visionPornFromUrl($image);
        }

        return $this->post('fcgi-bin/vision/vision_porn', [
            'image' => $this->transformBase64Image($image),
        ]);
    }

    protected function visionPornFromUrl($url)
    {
        return $this->post('fcgi-bin/vision/vision_porn', [
            'image_url' => $url,
        ]);
    }
}
