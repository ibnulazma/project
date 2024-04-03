<?php

namespace App\Controllers;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Font\Font;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QRGenerator extends BaseController
{

    protected QrCode $qrCode;
    protected PngWriter $writer;
    protected Logo $logo;
    protected Label $label;
    protected Font $labelFont;
    protected Color $foregroundColor;
    protected Color $foregroundColor2;
    protected Color $backgroundColor;

    protected string $relativePath;
    protected string $qrCodeFilePath;

    public function __construct()
    {
        $this->relativePath = ROOTPATH . '/';
        $this->qrCodeFilePath = 'public/uploads/';

        if (!file_exists($this->relativePath . $this->qrCodeFilePath)) {
            mkdir($this->relativePath . $this->qrCodeFilePath);
        }

        $this->writer = new PngWriter();

        $this->labelFont = new Font($this->relativePath . 'public/AdminLTE/font/Roboto-Medium.ttf', 14);

        $this->foregroundColor = new Color(44, 73, 162);
        $this->foregroundColor2 = new Color(28, 101, 90);
        $this->backgroundColor = new Color(255, 255, 255);

        // Create logo
        $this->logo = Logo::create(base_url('public/foto/logo.png'))->setResizeToWidth(75);

        $this->label = Label::create('')
            ->setFont($this->labelFont)
            ->setTextColor($this->foregroundColor);

        // Create QR code
        $this->qrCode = QrCode::create('')
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor($this->foregroundColor)
            ->setBackgroundColor($this->backgroundColor);
    }


    public function generateQrSiswa()
    {
        $kelas = url_title($this->request->getVar('kelas'), '-', true);

        $this->qrCodeFilePath .= 'qr-siswa/' . $kelas . '/';

        if (!file_exists($this->relativePath . $this->qrCodeFilePath)) {
            mkdir($this->relativePath . $this->qrCodeFilePath, recursive: true);
        }

        $this->generate(

            nama: $this->request->getVar('nama'),
            nisn: $this->request->getVar('nisn')
        );

        return $this->response->setJSON(true);
    }

    protected function generate($nama, $nisn)
    {
        $filename = url_title($nama, separator: '-', lowercase: true) . "_" . url_title($nisn, separator: '-', lowercase: true) . '.png';

        // set qr code data
        $this->qrCode->setData($nisn);

        $this->label->setText($nama);

        // Save it to a file
        $this->writer
            ->write(qrCode: $this->qrCode, logo: $this->logo, label: $this->label)
            ->saveToFile(path: $this->relativePath . $this->qrCodeFilePath . $filename);
    }
}
