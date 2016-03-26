<?php 
namespace AppBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class GameAdmin extends Admin{
    /**
   * Конфигурация формы редактирования записи
   * 
   * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
   */
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('title', null, array('label' => 'Заголовок', 'attr' => array('style' => 'width:583px')))
      ->add('description', null, array('label' => 'Описание', 'attr' => array('class' => 'foreditor', 'style' => 'width:569px;height:100px;')))
      ->add('price', null, array('label' => 'Цена', 'attr' => array('class' => 'foreditor', 'style' => 'width:569px;height:200px;')));
  }
 
  /**
   * Конфигурация списка записей
   *
   * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
   */
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('id')
      ->addIdentifier('title', null, array('label' => 'Заголовок'))
      ->add('slug', null, array('label' => 'URL'));
  }
 
  /**
   * Поля, по которым производится поиск в списке записей
   *
   * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
   */
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
      ->add('title', null, array('label' => 'Заголовок'));
  }   
}