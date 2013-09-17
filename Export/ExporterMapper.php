<?php
/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace Sonata\AdminBundle\Export;

use Sonata\AdminBundle\Mapper\BaseMapper;

/**
 * This class is use to simulate the Form API
 *
 */
class ExportMapper extends BaseMapper
{
    protected $fields;

    /**
     * @throws \RuntimeException
     *
     * @param string $name
     * @param string $type
     * @param array  $filterOptions
     * @param string $fieldType
     * @param array  $fieldOptions
     *
     * @return ExportMapper
     */
    public function add($name)
    {
        $this->fields[] = $name; 
        return $this;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->has($name) ? $name : null;
    }

    /**
     * @param string $key
     *
     * @return boolean
     */
    public function has($key)
    {
    	if(in_array($key, $this->fields))
			return true;
        return false;
    }

    /**
     * @param string $key
     *
     * @return \Sonata\AdminBundle\Export\ExportMapper
     */
    public function remove($key)
    {
        unset($this->fields[$name]);

        return $this;
    }

    /**
     * @param array $keys field names
     *
     * @return \Sonata\AdminBundle\Export\ExportMapper
     */
    public function reorder(array $keys)
    {
         $this->fields = array_merge(array_flip($keys), $this->fields);

        return $this;
    }
	
	public function getFields()
	{
		return $this->fields;
	}
}
