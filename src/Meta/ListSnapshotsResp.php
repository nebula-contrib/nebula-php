<?php
namespace Nebula\Meta;

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

class ListSnapshotsResp
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'code',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\Nebula\Common\ErrorCode',
        ),
        2 => array(
            'var' => 'leader',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Common\HostAddr',
        ),
        3 => array(
            'var' => 'snapshots',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Nebula\Meta\Snapshot',
                ),
        ),
    );

    /**
     * @var int
     */
    public $code = null;
    /**
     * @var \Nebula\Common\HostAddr
     */
    public $leader = null;
    /**
     * @var \Nebula\Meta\Snapshot[]
     */
    public $snapshots = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['code'])) {
                $this->code = $vals['code'];
            }
            if (isset($vals['leader'])) {
                $this->leader = $vals['leader'];
            }
            if (isset($vals['snapshots'])) {
                $this->snapshots = $vals['snapshots'];
            }
        }
    }

    public function getName()
    {
        return 'ListSnapshotsResp';
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
                        $xfer += $input->readI32($this->code);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->leader = new \Nebula\Common\HostAddr();
                        $xfer += $this->leader->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::LST) {
                        $this->snapshots = array();
                        $_size342 = 0;
                        $_etype345 = 0;
                        $xfer += $input->readListBegin($_etype345, $_size342);
                        for ($_i346 = 0; $_i346 < $_size342; ++$_i346) {
                            $elem347 = null;
                            $elem347 = new \Nebula\Meta\Snapshot();
                            $xfer += $elem347->read($input);
                            $this->snapshots []= $elem347;
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
        $xfer += $output->writeStructBegin('ListSnapshotsResp');
        if ($this->code !== null) {
            $xfer += $output->writeFieldBegin('code', TType::I32, 1);
            $xfer += $output->writeI32($this->code);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->leader !== null) {
            if (!is_object($this->leader)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('leader', TType::STRUCT, 2);
            $xfer += $this->leader->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->snapshots !== null) {
            if (!is_array($this->snapshots)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('snapshots', TType::LST, 3);
            $output->writeListBegin(TType::STRUCT, count($this->snapshots));
            foreach ($this->snapshots as $iter348) {
                $xfer += $iter348->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
