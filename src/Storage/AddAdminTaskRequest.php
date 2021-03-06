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

class AddAdminTaskRequest
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'cmd',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\Nebula\Meta\AdminCmd',
        ),
        2 => array(
            'var' => 'job_id',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'task_id',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        4 => array(
            'var' => 'para',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Storage\TaskPara',
        ),
        5 => array(
            'var' => 'concurrency',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var int
     */
    public $cmd = null;
    /**
     * @var int
     */
    public $job_id = null;
    /**
     * @var int
     */
    public $task_id = null;
    /**
     * @var \Nebula\Storage\TaskPara
     */
    public $para = null;
    /**
     * @var int
     */
    public $concurrency = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['cmd'])) {
                $this->cmd = $vals['cmd'];
            }
            if (isset($vals['job_id'])) {
                $this->job_id = $vals['job_id'];
            }
            if (isset($vals['task_id'])) {
                $this->task_id = $vals['task_id'];
            }
            if (isset($vals['para'])) {
                $this->para = $vals['para'];
            }
            if (isset($vals['concurrency'])) {
                $this->concurrency = $vals['concurrency'];
            }
        }
    }

    public function getName()
    {
        return 'AddAdminTaskRequest';
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
                        $xfer += $input->readI32($this->cmd);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->job_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->task_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRUCT) {
                        $this->para = new \Nebula\Storage\TaskPara();
                        $xfer += $this->para->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->concurrency);
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
        $xfer += $output->writeStructBegin('AddAdminTaskRequest');
        if ($this->cmd !== null) {
            $xfer += $output->writeFieldBegin('cmd', TType::I32, 1);
            $xfer += $output->writeI32($this->cmd);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->job_id !== null) {
            $xfer += $output->writeFieldBegin('job_id', TType::I32, 2);
            $xfer += $output->writeI32($this->job_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->task_id !== null) {
            $xfer += $output->writeFieldBegin('task_id', TType::I32, 3);
            $xfer += $output->writeI32($this->task_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->para !== null) {
            if (!is_object($this->para)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('para', TType::STRUCT, 4);
            $xfer += $this->para->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->concurrency !== null) {
            $xfer += $output->writeFieldBegin('concurrency', TType::I32, 5);
            $xfer += $output->writeI32($this->concurrency);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
