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

class LookupAndTraverseRequest
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'space_id',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'parts',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::I32,
            'elem' => array(
                'type' => TType::I32,
                ),
        ),
        3 => array(
            'var' => 'indices',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Storage\IndexSpec',
        ),
        4 => array(
            'var' => 'traverse_spec',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Storage\TraverseSpec',
        ),
        5 => array(
            'var' => 'common',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Storage\RequestCommon',
        ),
    );

    /**
     * @var int
     */
    public $space_id = null;
    /**
     * @var int[]
     */
    public $parts = null;
    /**
     * @var \Nebula\Storage\IndexSpec
     */
    public $indices = null;
    /**
     * @var \Nebula\Storage\TraverseSpec
     */
    public $traverse_spec = null;
    /**
     * @var \Nebula\Storage\RequestCommon
     */
    public $common = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['space_id'])) {
                $this->space_id = $vals['space_id'];
            }
            if (isset($vals['parts'])) {
                $this->parts = $vals['parts'];
            }
            if (isset($vals['indices'])) {
                $this->indices = $vals['indices'];
            }
            if (isset($vals['traverse_spec'])) {
                $this->traverse_spec = $vals['traverse_spec'];
            }
            if (isset($vals['common'])) {
                $this->common = $vals['common'];
            }
        }
    }

    public function getName()
    {
        return 'LookupAndTraverseRequest';
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
                    if ($ftype == TType::LST) {
                        $this->parts = array();
                        $_size326 = 0;
                        $_etype329 = 0;
                        $xfer += $input->readListBegin($_etype329, $_size326);
                        for ($_i330 = 0; $_i330 < $_size326; ++$_i330) {
                            $elem331 = null;
                            $xfer += $input->readI32($elem331);
                            $this->parts []= $elem331;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->indices = new \Nebula\Storage\IndexSpec();
                        $xfer += $this->indices->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRUCT) {
                        $this->traverse_spec = new \Nebula\Storage\TraverseSpec();
                        $xfer += $this->traverse_spec->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRUCT) {
                        $this->common = new \Nebula\Storage\RequestCommon();
                        $xfer += $this->common->read($input);
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
        $xfer += $output->writeStructBegin('LookupAndTraverseRequest');
        if ($this->space_id !== null) {
            $xfer += $output->writeFieldBegin('space_id', TType::I32, 1);
            $xfer += $output->writeI32($this->space_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->parts !== null) {
            if (!is_array($this->parts)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('parts', TType::LST, 2);
            $output->writeListBegin(TType::I32, count($this->parts));
            foreach ($this->parts as $iter332) {
                $xfer += $output->writeI32($iter332);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->indices !== null) {
            if (!is_object($this->indices)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('indices', TType::STRUCT, 3);
            $xfer += $this->indices->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->traverse_spec !== null) {
            if (!is_object($this->traverse_spec)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('traverse_spec', TType::STRUCT, 4);
            $xfer += $this->traverse_spec->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->common !== null) {
            if (!is_object($this->common)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('common', TType::STRUCT, 5);
            $xfer += $this->common->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
