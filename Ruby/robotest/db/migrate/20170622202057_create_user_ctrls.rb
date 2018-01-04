class CreateUserCtrls < ActiveRecord::Migration[5.1]
  def change
    create_table :user_ctrls do |t|

      t.timestamps
    end
  end
end
