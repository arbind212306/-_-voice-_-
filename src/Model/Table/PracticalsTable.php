<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Practicals Model
 *
 * @method \App\Model\Entity\Practical get($primaryKey, $options = [])
 * @method \App\Model\Entity\Practical newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Practical[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Practical|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practical|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practical patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Practical[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Practical findOrCreate($search, callable $callback = null, $options = [])
 */
class PracticalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('practicals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 100)
            ->allowEmpty('user_name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->allowEmpty('address');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
