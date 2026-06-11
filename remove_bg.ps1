Add-Type -AssemblyName System.Drawing
$bmp = [System.Drawing.Bitmap]::FromFile("images\resource\epc-process-2.png")
$width = $bmp.Width
$height = $bmp.Height
$transparentColor = [System.Drawing.Color]::FromArgb(0, 0, 0, 0)
for ($x = 0; $x -lt $width; $x++) {
    for ($y = 0; $y -lt $height; $y++) {
        $pixel = $bmp.GetPixel($x, $y)
        if ($pixel.R -gt 240 -and $pixel.G -gt 240 -and $pixel.B -gt 240) {
            $bmp.SetPixel($x, $y, $transparentColor)
        }
    }
}
$bmp.Save("images\resource\epc-process-2_temp.png", [System.Drawing.Imaging.ImageFormat]::Png)
$bmp.Dispose()
Move-Item -Path "images\resource\epc-process-2_temp.png" -Destination "images\resource\epc-process-2.png" -Force
