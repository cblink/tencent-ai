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
        return $this->post('fcgi-bin/vision/vision_porn', [
            'image' => $this->transformBase64Image($image),
        ]);
    }
}
