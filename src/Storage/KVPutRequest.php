<?php
namespace Nebula\Storage;

/**
 * Autogenerated by Thrift Compiler (0.15.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class KVPutRequest
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'space_id',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'parts',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::I32,
            'vtype' => TType::LST,
            'key' => array(
                'type' => TType::I32,
            ),
            'val' => array(
                'type' => TType::LST,
                'etype' => TType::STRUCT,
                'elem' => array(
                    'type' => TType::STRUCT,
                    'class' => '\Nebula\Common\KeyValue',
                    ),
                ),
        ),
    );

    /**
     * @var int
     */
    public $space_id = null;
    /**
     * @var array
     */
    public $parts = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['space_id'])) {
                $this->space_id = $vals['space_id'];
            }
            if (isset($vals['parts'])) {
                $this->parts = $vals['parts'];
            }
        }
    }

    public function getName()
    {
        return 'KVPutRequest';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->space_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::MAP) {
                        $this->parts = array();
                        $_size416 = 0;
                        $_ktype417 = 0;
                        $_vtype418 = 0;
                        $xfer += $input->readMapBegin($_ktype417, $_vtype418, $_size416);
                        for ($_i420 = 0; $_i420 < $_size416; ++$_i420) {
                            $key421 = 0;
                            $val422 = array();
                            $xfer += $input->readI32($key421);
                            $val422 = array();
                            $_size423 = 0;
                            $_etype426 = 0;
                            $xfer += $input->readListBegin($_etype426, $_size423);
                            for ($_i427 = 0; $_i427 < $_size423; ++$_i427) {
                                $elem428 = null;
                                $elem428 = new \Nebula\Common\KeyValue();
                                $xfer += $elem428->read($input);
                                $val422 []= $elem428;
                            }
                            $xfer += $input->readListEnd();
                            $this->parts[$key421] = $val422;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('KVPutRequest');
        if ($this->space_id !== null) {
            $xfer += $output->writeFieldBegin('space_id', TType::I32, 1);
            $xfer += $output->writeI32($this->space_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->parts !== null) {
            if (!is_array($this->parts)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('parts', TType::MAP, 2);
            $output->writeMapBegin(TType::I32, TType::LST, count($this->parts));
            foreach ($this->parts as $kiter429 => $viter430) {
                $xfer += $output->writeI32($kiter429);
                $output->writeListBegin(TType::STRUCT, count($viter430));
                foreach ($viter430 as $iter431) {
                    $xfer += $iter431->write($output);
                }
                $output->writeListEnd();
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
