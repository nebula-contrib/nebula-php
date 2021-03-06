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

class VertexProp
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tag',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'props',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var int
     */
    public $tag = null;
    /**
     * @var string[]
     */
    public $props = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['tag'])) {
                $this->tag = $vals['tag'];
            }
            if (isset($vals['props'])) {
                $this->props = $vals['props'];
            }
        }
    }

    public function getName()
    {
        return 'VertexProp';
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
                        $xfer += $input->readI32($this->tag);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->props = array();
                        $_size23 = 0;
                        $_etype26 = 0;
                        $xfer += $input->readListBegin($_etype26, $_size23);
                        for ($_i27 = 0; $_i27 < $_size23; ++$_i27) {
                            $elem28 = null;
                            $xfer += $input->readString($elem28);
                            $this->props []= $elem28;
                        }
                        $xfer += $input->readListEnd();
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
        $xfer += $output->writeStructBegin('VertexProp');
        if ($this->tag !== null) {
            $xfer += $output->writeFieldBegin('tag', TType::I32, 1);
            $xfer += $output->writeI32($this->tag);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->props !== null) {
            if (!is_array($this->props)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('props', TType::LST, 2);
            $output->writeListBegin(TType::STRING, count($this->props));
            foreach ($this->props as $iter29) {
                $xfer += $output->writeString($iter29);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
