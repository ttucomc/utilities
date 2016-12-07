
import CreateAdministrator from '../../components/CreateAdministrator.vue';

describe('CreateAdministrator', () => {
    it('should be able to display a form to add a new administrator to the database', function() {
        expect($('<h4>Create New Administrator</h4>')).toHaveText('Create New Administrator');
    })
});
