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

class Schema
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'columns',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Nebula\Meta\ColumnDef',
                ),
        ),
        2 => array(
            'var' => 'schema_prop',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Meta\SchemaProp',
        ),
    );

    /**
     * @var \Nebula\Meta\ColumnDef[]
     */
    public $columns = null;
    /**
     * @var \Nebula\Meta\SchemaProp
     */
    public $schema_prop = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['columns'])) {
                $this->columns = $vals['columns'];
            }
            if (isset($vals['schema_prop'])) {
                $this->schema_prop = $vals['schema_prop'];
            }
        }
    }

    public function getName()
    {
        return 'Schema';
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
                    if ($ftype == TType::LST) {
                        $this->columns = array();
                        $_size0 = 0;
                        $_etype3 = 0;
                        $xfer += $input->readListBegin($_etype3, $_size0);
                        for ($_i4 = 0; $_i4 < $_size0; ++$_i4) {
                            $elem5 = null;
                            $elem5 = new \Nebula\Meta\ColumnDef();
                            $xfer += $elem5->read($input);
                            $this->columns []= $elem5;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->schema_prop = new \Nebula\Meta\SchemaProp();
                        $xfer += $this->schema_prop->read($input);
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
        $xfer += $output->writeStructBegin('Schema');
        if ($this->columns !== null) {
            if (!is_array($this->columns)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('columns', TType::LST, 1);
            $output->writeListBegin(TType::STRUCT, count($this->columns));
            foreach ($this->columns as $iter6) {
                $xfer += $iter6->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->schema_prop !== null) {
            if (!is_object($this->schema_prop)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('schema_prop', TType::STRUCT, 2);
            $xfer += $this->schema_prop->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
